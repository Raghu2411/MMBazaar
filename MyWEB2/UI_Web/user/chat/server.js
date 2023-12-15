var app=require("express")();
var http=require("http").Server(app);
var io=require("socket.io")(http);
var mysql=require("mysql");
var con=mysql.createConnection({
	host:"localhost",user:"root",password:"",database:"mmbazaar"
});
var user={};
con.connect(function(err){
	if(err)
		console.log(err);
	else
		console.log("Connected to database successfully");
});
io.on('connection',function(socket){
	socket.on('disconnect',function(){
		var str=JSON.stringify(user);
		var index=(str.indexOf(""+socket.id))-3;
		var start=index-1;
		while(str.charAt(start)!='"')
				start--;
		str=str.substring(start+1,index);
		delete user[str];
		console.log("A user disconnected");
		io.emit("user_disconnect",str);
	});
	socket.on('newuser_join',function(data){
		user[data]=socket.id;
		console.log('A user connected with id:'+data);
		io.emit('user_connect',data);
	});
	socket.on('msg_send',function(data){
		if(user[data.to])
		{
			io.sockets.connected[user[data.to]].emit("new_msg",data);
		}
			if(data.tr_status=="sell")
				var tr_status="buy";
			else
				var tr_status="sell";
			var query="insert into msg_for_"+data.to+"(other_user,msg_type,status,\
			msg,assoc_item,trans_status,date,time) values("+data.from+",'"+data.type+"','receive','"+
			data.message+"',"+data.assoc_item+",'"+tr_status+"',curdate(),'"+data.time+"')";
			con.query(query,function(err,result){
				if(err) throw err;
			});
			query="insert into msg_for_"+data.from+"(other_user,msg_type,status,\
			msg,assoc_item,trans_status,date,time) values("+data.to+",'"+data.type+"','send','"+data.message
			+"',"+data.assoc_item+",'"+data.tr_status+"',curdate(),'"+data.time+"')";
			con.query(query,function(err,result){
				if(err) throw err;
			});
	});
	socket.on('active_check',function(data){
		var retVal={};
		for(var i=0;i<data.length;i++)
		{
			if(user[data[i]])
				retVal[data[i]]="yes";
			else
				retVal[data[i]]="no";
		}
		socket.emit("return_active_check",retVal);
	});
	socket.on("offer",function(data){
		var query="select * from offer where buyer="+data.from+" and seller="+data.to+
		" and assoc_item="+data.assoc_item;
		con.query(query,function(err,result){
			if(result.length==0)
				query="insert into offer(buyer,seller,buyer_name,assoc_item,amount) values ("+data.from+","+
			data.to+",'"+data.offer_name+"',"+data.assoc_item+",'"+data.amount+"')";
			else
				query="update offer set amount='"+data.amount+"',seen_status='no' where seller="+data.to+
			" and assoc_item="+data.assoc_item+" and buyer="+data.from;
			con.query(query,function(err,result){
				if(err) throw err;
			});
		});
		if(user[data.to])
		{
			io.sockets.connected[user[data.to]].emit("offer",data);
		}
	});
	socket.on("offer_seen",function(data){
		var  query="update offer set seen_status='yes' where buyer="+data.to+" and seller="+data.from+
		" and assoc_item="+data.assoc_item;
		con.query(query,function(err,result){
			if(err) throw err;
		});
	});
	socket.on("offer_done",function(prod_id){
		var query="update product set sold_status='yes' where prod_id="+prod_id;
		con.query(query,function(err,result){
			if(err) throw err;
		});
	});
});	
http.listen(8000,function(){
	console.log("Server running");
});
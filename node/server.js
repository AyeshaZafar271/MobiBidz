var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);


//RENDERING THE INDEX.HTML FILE / HOME PAGE

app.get('/', function(req, res){
  res.sendfile('index.html');
});

// SOCKET.IO METHOD FOR A CONNNECTION - STANDARD WAY FOR SOCKET CONNECTION

io.on('connection', function(socket){
  console.log('a user connected');
   socket.on('disconnect', function(){
    console.log('user disconnected');
  });
});

// SOCKET.IO METHOD FOR CHAT MESSAGE SUBMISSION USING EMIT

io.on('connection', function(socket){
  socket.on('chat message', function(msg){
    io.emit('chat message', msg);
  });
});

// STANDARD EXPRESS SERVER SETUP

http.listen(3000, function(){
  console.log('listening on *:3000');
});

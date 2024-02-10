const app = require('express')();
const http = require('http').Server(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 3000;

let cors = require("cors");
app.use(cors());


var execPHP = require('./execPhp.js')();

execPHP.phpFolder = 'C:\\xampp\\htdocs\\mobibidz\\';

app.use('*.php',function(request,response,next) {
	execPHP.parseFile(request.originalUrl,function(phpResult) {
		response.write(phpResult);
		response.end();
	});
});

app.get('/addBidding.php', (req, res) => {
  res.sendFile(__dirname + '/addBidding.php');
});


execPHP.phpFolder = 'C:\\xampp\\htdocs\\mobibidz\\node\\';

app.use('*.php',function(request,response,next) {
	execPHP.parseFile(request.originalUrl,function(phpResult) {
		response.write(phpResult);
		response.end();
	});
});

var user_id ="";
app.get('/addBidding/:id', (req, res) => {
	
	 id = req.params.id;
	 
	 
   res.sendFile(__dirname + '/addBidding.php');
   
   // res.sendFile(path.join(__dirname, '../public', '/addBidding.php'));
   console.log(__dirname);
  // res.redirect(__dirname +'/node/' + '/addBidding.php?user_id='+user_id);
   res.redirect('http://localhost/mobibidz/addBidding.php?id='+id);

});




io.on('connection', (socket) => {
  socket.on('chat message', msg => {
    io.emit('chat message', msg);
  });
});

http.listen(port, () => {
  console.log(`Socket.IO server running at http://localhost:${port}/`);
});
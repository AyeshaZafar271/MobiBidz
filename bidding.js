const app = require('express')();
const http = require('http').Server(app);

const port = process.env.PORT || 3000;

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/addBidding.html');
});

 const serverWithSocket = app.listen(port, () => {
      console.log(`Example app listening at http://localhost:${port}`);
     
     });

const io = require('socket.io')(console);

io.on('connection', (socket) => {
  socket.on('bidding message', msg => {
    io.emit('bidding message', msg);
  });
});

//http.listen(port, () => {
//  console.log(`Socket.IO server running at http://localhost:${port}/`);
//});
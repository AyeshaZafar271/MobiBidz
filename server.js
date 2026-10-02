var app = require("express")();
var http = require("http").Server(app);
var io = require("socket.io")(http, {
  cors: {
    origin: "*",
    methods: ["GET", "POST"],
  },
});
var path = require("path");

// HOME PAGE
app.get("/", function (req, res) {
  res.sendFile(path.join(__dirname, "index.html"));
});

// BIDDING ROUTE - productId_userId format
app.get("/addBidding/:id", function (req, res) {
  res.sendFile(path.join(__dirname, "addBidding.php"));
});

// SOCKET CONNECTION
io.on("connection", function (socket) {
  console.log("a user connected");

  socket.on("disconnect", function () {
    console.log("user disconnected");
  });

  // BID MESSAGE
  socket.on("chat message", function (msg) {
    io.emit("chat message", msg);
  });
});

// SERVER LISTEN
http.listen(3000, function () {
  console.log("listening on *:3000");
});

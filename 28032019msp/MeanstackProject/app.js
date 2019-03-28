var express = require('express');
var path = require('path');
var bodyParser = require('body-parser');
var cors = require('cors');
var passport = require('passport');
var mongoose = require('mongoose');
const config = require('./config/database');

//connect to database
mongoose.connect(config.database);

// on connection
mongoose.connection.on('connected', () =>{
    console.log("connected to database" + config.database);
});

//on error
mongoose.connection.on('error',(err) => {
    console.log("Database error" + err);
});
const app = express();

const users = require('./routes/users');
//port provider
const port = 5000;

// CORS middleware
app.use(cors());

//set static folder
app.use(express.static(path.join(__dirname,'public')));

//body parser middleware
app.use(bodyParser.json());

//passport middleware
app.use(passport.initialize());
app.use(passport.session());

require('./config/passport')(passport);

app.use('/users',users);

//Index route
app.get('/',function(req,res){
    res.send("invalid endpoint");
});

//start server
app.listen(port,function(){
    console.log("server started on port" +port);
});
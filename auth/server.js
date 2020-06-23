"use strict"
var port = process.env.PORT || 5000;

var Http = require('http');
var Express = require("express");
var colors = require("colors");
const dotenv = require("dotenv");
const morgan = require("morgan");
const errorHandler = require("./middleware/error");
const cookieParser = require("cookie-parser");
const connectDB = require("./config/db");

dotenv.config({ path: "./config/config.env" });

// require routes
const auth = require("./routes/auth");

connectDB();

const app = express();

app.use(express.json());
app.use(cookieParser());
App.use(BodyParser.urlencoded({
    extended: true
}));

// Dev logging middleware
if (process.env.NODE_ENV == "development") {
    app.use(morgan("dev"));
}

// mount routes
app.use("/api/v1/auth", auth);

app.use(errorHandler);


app.listen(
    PORT,
    console.log(
        `Server listening on port ${PORT} on ${process.env.NODE_ENV}`.green.bold
    )
);
Server.listen(port, function() {
    //modified port settings

})
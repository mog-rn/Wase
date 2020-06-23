const mongoose = require("mongoose");
const jwt = require("jsonwebtoken");
const bcrypt = require("bcryptjs");

const UserSchema = new mongoose.Schema({
    first_name: {
        type: String,
        required: [true, "Please provide a name"],
        trim: true,
    },
    last_name: {
        type: String,
        required: [true, "Please provide a name"],
        trim: true,
    },
    email: {
        type: String,
        required: [true, "Please add an email"],
        unique: true,
        match: [
            /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
            "Please add a valid email",
        ],
    },

    password: {
        type: String,
        required: [true, "Please add a password"],
        minlength: 6,
        select: false,
    },

    phone: {
        type: String,
        required: [true, "Telephone Number"],
        minlength: 10,
        select: false,
    },
    createdAt: {
        type: Date,
        default: Date.now,
    },
});

// hash password
UserSchema.pre("save", async function(next) {
    if (!this.isModified("password")) {
        next();
    }

    const salt = await bcrypt.genSalt(10);
    this.password = await bcrypt.hash(this.password, salt);
});

// get a token after registration
UserSchema.methods.getJwtSignature = function() {
    return jwt.sign({ id: this._id }, process.env.JWT_SECRET, {
        expiresIn: process.env.JWT_EXPIRE,
    });
};

// matchPassword
UserSchema.methods.matchPasword = async function(enteredPassword) {
    return await bcrypt.compare(enteredPassword, this.password);
};

module.exports = mongoose.model("User", UserSchema);
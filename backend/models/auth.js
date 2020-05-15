const mongoose = require("mongoose");

const UserSchema = new mongoose.Schema({
	name: {
		type: String,
		trim: true,
		required: [true, "you must provide a name"],
	},
	email: {
		type: String,
		match: [
			/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/,
			"Please add a valid email",
		],
		required: [true, "you must provide an email"],
		unique: true,
	},
	password: {
		type: String,
		minlength: [5, "password must be more than five characters"],
		select: false,
	},
	createdAt: {
		type: Date,
		default: Date.now,
	},
});

module.exports = mongoose.model("User", UserSchema);

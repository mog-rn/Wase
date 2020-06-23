const User = require('../models/User');
const asyncHandler = require('../middleware/async');
const ErrorResponse = require('../utils/errorResponse');

// @desc  Register new user
// route  POST /api/v1/auth/register
// access public
exports.register = asyncHandler(async(req, res, next) => {
    const { name, email, password, role } = req.body;

    // Create user
    const user = await User.create({
        name,
        email,
        password,
        role,
    });

    sendTokenResponse(user, 201, res);
});

// @desc  login registered user
// route  POST /api/v1/auth/login
// access public
exports.login = asyncHandler(async(req, res, next) => {
    const { email, password } = req.body;

    if (!email || !password) {
        return next(new ErrorResponse(`please enter an email and a password`, 400));
    }

    const user = await User.findOne({ email }).select('+password');

    if (!user) {
        return next(new ErrorResponse(`Invalid credentials`, 401));
    }

    const isMatch = await user.matchPasword(password);

    if (!isMatch) {
        return next(new ErrorResponse(`invalid credentials`, 401));
    }

    sendTokenResponse(user, 200, res);
});

// gets token from model creates cookie/token and sends response
const sendTokenResponse = asyncHandler(async(user, statusCode, res) => {
    const token = user.getJwtSignature();

    const options = {
        expires: new Date(
            Date.now() + process.env.JWT_COOKIE_EXPIRE * 60 * 60 * 24 * 1000
        ),
        httpOnly: true,
    };

    if (process.env.NODE_ENV === 'production') {
        options.secure = true;
    }

    res.status(statusCode).cookie('token', token, options).json({
        success: true,
        token,
    });
});

// @desc  get current user
// route  Get /api/v1/auth/getme
// access public
exports.getMe = asyncHandler(async(req, res, next) => {
    const user = await User.findById(req.user.id);

    res.status(200).json({
        success: true,
        data: user,
    });
});
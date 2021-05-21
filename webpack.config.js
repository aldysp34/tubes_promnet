const { options } = require('laravel-mix');
const path = require('path');
const { default: loader } = require('vue-loader');

module.exports = {
    resolve: {
        alias: {
            '@': path.resolve('resources/js'),
        },
    },
};



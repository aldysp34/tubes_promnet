const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */



//  mix.js(['resources/js/app.js', 'public/fontawesome/js/all.js'], 'public/js').vue()
//  .postCss('resources/css/app.css', 'public/css', [
//      require('postcss-import'),
//      require('tailwindcss'),
//      require('autoprefixer'),
//  ])
//  .webpackConfig(require('./webpack.config'));

// mix.sass('resources/sass/app.scss', 'public/css');
// mix.js('resources/js/app.js', 'public/js').vue()
//     .postCss('resources/css/app.css', 'public/css', [
//         require('postcss-import'),
//         require('tailwindcss'),
//         require('autoprefixer'),
//     ])
//     .webpackConfig(require('./webpack.config'))
//     .sass('resources/sass/app.scss', 'public/css');

// mix.setResourceRoot('public/')
//     .combine([
//         'public/css/app.css',
//     ], 'public/css/all.css')
//     .version();
// // mix.combine(['public/css/*'], 'public/css/all.css');

mix
    .js('resources/js/app.js', 'public.js')
    .vue()
    .postCss('resources/css/app.css', 'public/css', [
        cssImport(),
        cssNesting(),
        require('tailwindcss'),
    ]).sourceMaps();
    

mix.webpackConfig({
    module: {
        rules: [
        {
            test: /\.jsx?$/,
            exclude: /node_modules(?!\/foundation-sites)|bower_components/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env']
                }
            }
        }
        ]
    },
    output: {
        chunkFilename: 'js/[name].js?id=[chunkhash]'
    },
    resolve: {
        alias: {
            vue$: 'vue/dist/vue.runtime.esm.js',
            '@': path.resolve('resources.js'),
        },
    },
}).version().sourceMaps();

if (mix.inProduction()) {
    mix.version();
}

// mix
//     .js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css')
//     .copy(
//         'node_modules/@fortawesome/fontawesome-free/webfonts',
//         'public/webfonts'
//     )

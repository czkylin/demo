var webpack = require('webpack');
var path = require("path");
var ET = require('extract-text-webpack-plugin');

module.exports = {
    entry: __dirname + '/src/app.js',
    output: {
        path: __dirname + '/prd/',
        // filename: 'bundle-[hash].js'
        filename: 'bundle.js'
    },
    devtool: 'source-map',
    module: {
        loaders: [
            {
                test: /\.css$/,//.css 文件使用 style-loader 和 css-loader 来处理
                loader: 'style-loader!css-loader'//-loader可以不写,多个loader之间用"!"连接起来。
            },
            {
                test: /\.js$/,
                loader: 'babel-loader?presets[]=es2015'
            },
            {
                test: /\.scss$/,
                // loader: 'style!css!sass'
                loader: ET.extract('style-loader', 'css-loader!sass-loader')
            },
            {
                test: /\.string$/,
                loader: 'string-loader'
            },
            {
                test: /\.vue$/,
                loader: 'vue-loader'
            },            
            // { //图片文件使用 url-loader 来处理，小于8kb的直接转为base64
            //     test: /\.(png|jpg)$/, 
            //     loader: 'url-loader?limit=8192'
            // },
           /* { //.css 文件使用 style-loader 和 css-loader 来处理
                test: /\.css$/, 
                loader: 'style-loader!css-loader' 
            },          
            { //.js 文件使用 jsx-loader 来编译处理
                test: /\.js$/, 
                loader: 'jsx-loader?harmony' 
            },
            { //.scss 文件使用 style-loader、css-loader 和 sass-loader 来编译处理
                test: /\.scss$/, 
                loader: 'style!css!sass?sourceMap'
            },*/
        ],
        // vue:{
        //   loaders:{
        //     js:'babel'
        //   }
        // }
    },
    resolve:{
        extensions: ['js', '.json', '.scss','vue'],
        alias:{
            'vue$': 'vue/dist/vue.min.js'
        }
    },
    // devServer: {
    //     contentBase: __dirname + '/prd',
    //     port: 80,
    //     host: 'localhost',
    //     proxy: {
    //       '/api': {
    //         target: 'http://localhost:9000',
    //         pathRewrite: {
    //           '^/api': ''
    //         }
    //       }
    //     }
    // },
    plugins: [
        new webpack.optimize.UglifyJsPlugin(),
        new ET('bundle.css')
    ]
}
 
const webpack = require('webpack');
const path = require('path');
const webpackNotifierPlugin = require('webpack-notifier');
const htmlWebpackPlugin = require('html-webpack-plugin');

module.exports = {
  context: __dirname,
  entry: './src/main.js',
  watch: true,
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: '[name].js',
    publicPath: 'dist'
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        loader: 'babel-loader',
        include: path.resolve(__dirname, 'src'),
        options: {
          presets: ['es2015']
        }
      },
      {
        test: /\.(png|jpg|jpeg|gif|woff|woff2|ttf|eot|svg|swf)$/,
        use: [
          {
            loader: 'url-loader',
            options: {
              name: 'img\/[name]-[hash:5].[ext]',
              limit: 100000
            }
          }
        ]
      }
    ]
  },
  plugins: [
    new webpackNotifierPlugin({
      title: '搞定啦，哦也！',
      contentImage: path.resolve(__dirname, 'Fq.jpeg'),
      alwaysNotify: true
    }),
    new htmlWebpackPlugin({
      template: './src/template.html',
      filename: '../index.html',
      inject: 'body'
    })
  ]
};
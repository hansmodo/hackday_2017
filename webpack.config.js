const UglifyJSPlugin = require('uglifyjs-webpack-plugin')

module.exports = {
  entry: './app.js',
  output: {
    filename: './dist/js/archive_bundle.js'
  },
  module: {
    loaders: [
      {
        test: /\.js$/,
        exclude: /node_modules/
      }
    ]
  },
  plugins: [
    new UglifyJSPlugin()
  ]
};

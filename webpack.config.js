const path = require('path');

module.exports = {
  entry: {
    main: './src/javaScript/main.js',
    // home: './src/javaScript/pages/home.js',
  },
  output: {
    filename: '[name].js',
    path: path.resolve(__dirname, 'dist/js')
  },
  module: {
    rules: [
      {
        test: /\.scss$/,
        use: [
          'style-loader',
          'css-loader',
          'sass-loader'
        ],
      },
    ],
  },
};
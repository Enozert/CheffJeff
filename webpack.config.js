const path = require('path');
const ExtractTextPlugin = require('extract-text-webpack-plugin');

module.exports = {
  entry: {
    home: './src/javaScript/pages/home.js',
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
          ExtractTextPlugin.extract({
            fallback: 'style-loader',
            use:['css-loader','sass-loader'],
          }),
        ],
      },
      // {
      //   test: /\.css$/,
      //   use: [
      //     MiniCssExtractPlugin.loader,
      //     'css-loader',
      //   ]
      // },
      {
        test: /\.(woff(2)?|ttf|otf|eot|svg)(\?v=\d+\.\d+\.\d+)?$/,
        use: [
          {
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: '../fonts'
            }
          }
        ]
      },
    ],
  },
  plugins: [
    new ExtractTextPlugin({
      filename:'app.bundle.css'
    }),
  ],
  // watch: true,
};
const path = require("path");
const PugPlugin = require("pug-plugin");
const HtmlWebpackPlugin = require("html-webpack-plugin");

module.exports = {
  entry: {
    index1: "./src/index1.pug",
    index2: "./src/index2.pug",
    index3: "./src/index3.pug",
    admin: "./src/admin.pug",
  },

  output: {
    path: path.join(__dirname, "dist"),
    clean: true,
  },

  module: {
    rules: [
      {
        test: /\.js$/,
        use: "babel-loader",
        exclude: /node_modules/,
      },
      {
        test: /\.pug$/,
        loader: PugPlugin.loader,
      },
      {
        test: /\.(sass|scss|css)$/,
        use: [
          "css-loader",
          "postcss-loader",
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
            },
          },
        ],
      },
      {
        test: /\.(png|jpg|jpeg|gif|svg|mp4)$/i,
        type: "asset/resource",
        generator: {
          filename: path.join("images", "[name].[contenthash][ext]"),
        },
      },
      {
        test: /\.(woff2?|eot|ttf|otf)$/i,
        type: "asset/resource",
        generator: {
          filename: "fonts/[name][ext][query]",
        },
      },
    ],
  },

  plugins: [
    new PugPlugin({
      pretty: true,
      js: {
        filename: "js/[name].[contenthash:8].js",
      },
      css: {
        filename: "css/[name].[contenthash:8].css",
      },
    }),
  ],

  devServer: {
    // watchFiles: path.join(__dirname, 'src'),
    // port: 9000,
    historyApiFallback: true,
    proxy: {
      "/": {
        target: "http://localhost",
      },
    },
    static: {
      directory: path.join(__dirname, "dist"),
      serveIndex: true,
    },
    watchFiles: {
      paths: ["src/**/**/*.*"],
      options: {
        usePolling: true,
      },
    },
  },
};

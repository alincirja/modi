const mode = process.env.NODE_ENV || "development";

const webpack = require("webpack");
const autoprefixer = require("autoprefixer");
const precss = require("precss");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");

const entry = {
    "main": "./client_src/main.js"
}

const _module = {
    rules: [
        {
            test: /\.js$/,
            exclude: /node_modules/,
            loader: "babel-loader"
        },
        {
            test: /\.css$/,
            exclude: /node_modules/,
            use: [
                MiniCssExtractPlugin.loader,
                {
                    loader: "css-loader",
                    options: {
                        sourceMap: true,
                        url: false
                    }
                },
                {
                    loader: "postcss-loader",
                    options: {
                        sourceMap: true,
                        url: false
                    }
                }
            ]
        },
        {
            test: /\.scss$/,
            exclude: /node_modules/,
            use: [
                MiniCssExtractPlugin.loader,
                {
                    loader: "css-loader",
                    options: {
                        sourceMap: true,
                        url: false
                    }
                },
                {
                    loader: "postcss-loader",
                    options: {
                        sourceMap: true,
                        plugins: [
                            require('precss'),
                            require('autoprefixer')
                        ]
                    }
                },
                {
                    loader: "sass-loader",
                    options: {
                        sourceMap: true,
                        url: false
                    }
                }
            ]
        }
    ]
}

const output = {
    filename: "[name].min.js",
    path: __dirname + "/static/js/"
}

const plugins = [
    new MiniCssExtractPlugin({
        filename: "../css/style.css"
    }),
    new webpack.LoaderOptionsPlugin({
        options: {
            postcss: [
                autoprefixer({
                    browsers: ['last 3 versions', '> 1%']
                })
            ]
        }
    })
]

module.exports = {
    entry,
    mode,
    module: _module,
    devtool: 'source-map',
    output,
    plugins
}
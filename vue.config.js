const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
    publicPath: process.env.NODE_ENV === "production"
        ? "/chd102/g5/"
        : "/",
    transpileDependencies: true,
    filenameHashing: false,
    css: {
        sourceMap: true,
    },
    chainWebpack: (config) => {
        config.plugin("html").tap((args) => {
            args[0].title = `日日旅著 | Daily.TW`;
            return args;
        });
    },
});

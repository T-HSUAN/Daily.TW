const { defineConfig } = require("@vue/cli-service");
module.exports = defineConfig({
    transpileDependencies: true,
    filenameHashing: false,
    css: {
        sourceMap: true,
    },
    chainWebpack: (config) => {
        config.plugin("html").tap((args) => {
            args[0].title = `Daily.TW`;
            return args;
        });
    },
});

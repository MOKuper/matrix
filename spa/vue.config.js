const path = require("path");

function addStyleResource(rule) {
  rule
    .use("style-resource")
    .loader("style-resources-loader")
    .options({
      patterns: [path.resolve(__dirname, "./src/styles/imports.styl")]
    });
}

module.exports = {
  chainWebpack: config => {
    config.plugin("html").tap(args => {
      args[0].title = "Asics";
      return args;
    });

    const types = ["vue-modules", "vue", "normal-modules", "normal"];
    types.forEach(type =>
      addStyleResource(config.module.rule("css").oneOf(type))
    );
  },
  // devServer: {
  //   https: true,
  //   host: process.env.VUE_SERVE_DOMAIN,
  //   port: 8007
  // }
};

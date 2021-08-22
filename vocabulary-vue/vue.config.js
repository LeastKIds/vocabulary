module.exports = {
  devServer:{
    proxy:{
      '/api':{
        target:'http://3.35.216.91',
        changeOrigin:true,
        pathRewrite:{
          '^/api':''
        }
      }
    }
  },

  transpileDependencies: [
    'vuetify'
  ]
}

//index.js
//获取应用实例
const app = getApp();
const apiUrl = app.globalData.apiUrl;

Page({
  data: {
    sitename:'小程序',
    developer:'cpc'
  },
  scope:function(e){
    let userInfo = e.detail.userInfo;
    wx.authorize({
      scope: "scope.userInfo",
      success() {
        wx.request({
          url: apiUrl+'register',
          method:'post',
          data:{
            'username':userInfo.nickName,
            // 'sex':userInfo.gender==1?'男':'女',
            'avatar':userInfo.avatarUrl,
            'xcx_openid':wx.getStorageSync('openid')
          },
          success:function(res){
            wx.switchTab({
              url: "/pages/menu/index"
            })
          }
        })
      },
      fail:function(){
        wx.showModal({
          title: '提示',
          content: '取消授权',
          showCancel: false,
          success(res) {
            console.log('用户点击确定')
          }
        })
      }
    })
  }
  

})

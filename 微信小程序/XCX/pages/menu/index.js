// pages/menu/index.js
const app = getApp();
const apiUrl = app.globalData.apiUrl;

var offset = 0;

Page({

  /**
   * 页面的初始数据
   */
  data: {
    imgUrl: app.globalData.imgUrl,
    background: ['/images/ad1.jpg', '/images/ad2.png', '/images/ad3.png'],
    indicatorDots: true,
    vertical: false,
    autoplay: true,
    interval: 2000,
    duration: 500,
    menu:[],
    
  },
  /**
   * 加载商品的请求
   */
  getMenu: function () {
    let me = this;
    //加载
      wx.showLoading({
        title: '正在加载',
      })
    wx.request({
      url: apiUrl + 'menu',
      type: 'get',
      data: {
        'offset':offset,'limit':5
        },
      success: function (res) {
      
        if (res.data.code == 0) {
          //取出已有的菜品数据，加上查询的数据
          let menu = me.data.menu;
          offset = offset + 5
          me.setData({
            menu: menu.concat(res.data.data),
          })
        } else {
          wx.showToast({
            title: '没有找到菜品数据',
            icon: 'none',
            duration: 2000
          })
          wx.hideLoading()
        }
      },
      complete:function(){
        wx.hideLoading();
      }
    })
  },

  /**
   * 登录
   */
  login:function(){
    wx.login({
      success(res) {
        if (res.code) {
          //发起网络请求
          wx.request({
            url: apiUrl+'openid',
            data: {
              code: res.code
            },
            success:function(res_su){
              if(!res_su.data.code){
                //登录成功
                // console.log('bbb')
                wx.setStorageSync('mid', res_su.data.data.id);
                wx.setStorageSync('name', res_su.data.data.username);
                wx.setStorageSync('avatar', res_su.data.data.avatar);
                wx.setStorageSync('user', res_su.data.data);
                wx.setStorageSync('openid', res_su.data.data.xcx_openid)
              }else{
              //登录失败
                // console.log(res_su)
                let data = JSON.parse(res_su.data.data) 
                wx.setStorageSync('openid',data.openid)
                wx.redirectTo({
                  url: '/pages/index/index',
                })
              }
            }
          })
        } else {
          console.log('登录失败！' + res.errMsg)
        }
       
      }
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.getMenu();
    this.login();
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {
    this.getMenu();
  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  },
  search: function (e) {
    let keywords = e.detail.value.keywords;
    if (keywords) {
      wx.navigateTo({
        url: '/pages/search/index?keywords=' + keywords,
      })
    } else {
      wx.showToast({
        title: '搜索关键字不能为空',
        icon: 'none',
        duration: 2000
      })
    }

  },

})
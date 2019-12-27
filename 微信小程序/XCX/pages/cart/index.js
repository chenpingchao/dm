// pages/cart/index.js
const app = getApp()
const apiUrl = app.globalData.apiUrl
Page({

  /**
   * 页面的初始数据
   */
  data: {
    cart:[],
    imgUrl:app.globalData.imgUrl,
    active:1,
    allprice:0
  },

  /**
   * 查询购物车中所有商品
   */
  getCart:function(){
    let me = this
    wx.request({
      url: apiUrl+'getCart',
      data:{
        mid:wx.getStorageSync('mid')
      },
      success:function(res){
        console.log(res)
        me.setData({
          cart:res.data.data
        })
        me.allprice();
      }
    })
    },

  /**
   * 购物车中购买数量加
   */
  add:function(e){
    let me = this
    let key = e.target.dataset.key;
    let cart = me.data.cart
    wx.request({
      url: apiUrl + 'buynumAdd',
      data:({
        cid: cart[key].id,
      }),
      success:function(res){
        if(res.data.code == 0){
          cart[key].buynum += 1
          me.setData({
            cart:cart
          })
          me.allprice();
        }else{
          wx.showToast({
            title: '失败了',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })
    me.allprice();
  },

  /**
   * 购物车中购买数量减
   */
  minus: function (e) {
    let me = this
    let key = e.target.dataset.key;
    let cart = me.data.cart
    wx.request({
      url: apiUrl + 'buynumMinus',
      data: ({
        cid: cart[key].id,
      }),
      success: function (res) {
        if (res.data.code == 0) {
          cart[key].buynum -= 1
          me.setData({
            cart: cart
          })
          me.allprice();
        } else {
          wx.showToast({
            title: '失败了',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })
  
  },

/**
   * 购物车中商品状态改变
   */
  active:function(e){
    let me = this
    let key = e.target.dataset.key;
    let cart = me.data.cart;
    wx.request({
      url: apiUrl + 'active',
      data: ({
        cid: cart[key].id,
        active : cart[key].active == 1 ? 2 : 1
      }),
      success: function (res) {
        if (res.data.code == 0) {
          cart[key].active = cart[key].active==1 ? 2 :1;
          me.setData({
            cart: cart
          })
          me.allprice();
        } else {
          wx.showToast({
            title: '失败了',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })
    
  },

  /**
   * 购物车总价
   */
  allprice: function () {
    let me = this
    let cart = me.data.cart;
    let allprice = 0;
    for (let i = 0; i <cart.length ; i++){
      if (cart[i].active == 1){
        allprice += cart[i].price * cart[i].buynum
      }
    }
    me.setData({
      allprice: allprice
    })
    
  },

  /**
     * 购物车中全选按钮
     */
  allactive: function () {
    let me = this
    let cart = me.data.cart;
    wx.request({
      url: apiUrl + 'allactive',
      data: ({
        mid:wx.getStorageSync('mid'),
        active: me.data.active==1?2:1
      }),
      success: function (res) {
        if (res.data.code == 0) {
          active = me.data.active == 1 ? 2 : 1;
          me.setData({
            active:active
          })
          //改变所有按钮的状态
          for(let m=0;m<cart.length;m++){
            cart[m].active = active;
          }
          //计算总价格
          me.allprice();
        } else {
          wx.showToast({
            title: '失败了',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })

  },

   /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.getCart();
    
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

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})
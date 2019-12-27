// pages/menu/detail/index.js
const app = getApp();
const apiUrl = app.globalData.apiUrl;
const imgUrl = app.globalData.imgUrl;

Page({

  /**
   * 页面的初始数据
   */
  data: {
    detail:[],
    imgUrl:imgUrl,
    cart_num:0,
    uid:0
  },
  /**
   * 获取商品的详细信息
   */
  getMenuDetail(id){
    let me = this
    wx.request({
      url: apiUrl+'menu/' + id, 
      success(res) {
        if(res.data.code == 0){
          me.setData({
            detail:res.data.data
          })
        }else{
          wx.showToast({
            title: '没有找到菜品数据',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })
      
  },
  /**
   * 加入购物车
   */
  addcart:function() {
    let me = this
    wx.request({
      url: apiUrl + 'addcart',
      data:{
        uid:me.data.uid,
        mid:wx.getStorageSync('mid')
      },
      success(res) {
        if (res.data.code == 0) {
          me.setData({
            cart_num: me.data.cart_num+1
          })
        } else {
          wx.showToast({
            title: '购物车添加失败',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })

  },
  /**
     *查询购物车的商品数量
     */
  cart_num: function () {
    let me = this
    wx.request({
      url: apiUrl + 'cart_num',
      data: {
        mid: wx.getStorageSync('mid')
      },
      success(res) {
        console.log(res)
        if (res.data.code == 0) {
          me.setData({
            cart_num: res.data.data.num
          })
        } else {
          wx.showToast({
            title: '查询失败',
            icon: 'none',
            duration: 2000
          })
        }
      }
    })

  },
  /**
     *跳转到购物车
     */
  goCart:function(){
    wx.switchTab({
      url: '/pages/cart/index'
    })
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {  
    //获取商品的详细信息
    
    this.setData({
      uid:options.id,
    })
    this.getMenuDetail();
    this.cart_num()
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
// pages/search/index.js
const app = getApp();
const apiUrl = app.globalData.apiUrl;

var offset = 0;
Page({

  /**
   * 页面的初始数据
   */
  data: {
    imgUrl: app.globalData.imgUrl,
    menu: [],
    keywords: '',
    priceAsc: 'price-asc',
    priceDesc: 'price-desc',
    saledAsc: 'saled-asc',
    saledDesc: 'saled-desc',
    order: 'price-asc'
  },
  /**
  * 加载商品的请求
  */
  getMenu: function (e) {
    let me = this;
    //加载样式
    wx.showLoading({
      title: '正在加载',
    })
    if(!e){
      e='';
    }
    wx.request({
      url: apiUrl + 'menu',
      type: 'get',
      data: {
        'offset': offset,
        'limit': 5,
        'keywords': e, 
        'order': me.data.order,
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
      complete: function () {
        wx.hideLoading();
      }
    })
  },
  /**
   * 
   * 搜索函数
   */
  search: function (e) {
    let keywords = e.detail.value.keywords;
    if (keywords) {
      offset = 0;
      this.setData({
        menu: [],
        keywords: keywords
      })
      this.getMenu(keywords);
    } else {
      wx.showToast({
        title: '搜索关键字不能为空',
        icon: 'none',
        duration: 2000
      })
    }

  },
  //价格排序
  priceSort: function (e) {
    offset = 0;
    if (e.currentTarget.dataset.sort == 'asc') {
      this.setData({
        priceAsc: 'price-asc-active',
        priceDesc: 'price-desc',
        saledAsc: 'saled-asc',
        saledDesc: 'saled-desc',
        order: 'price-asc',
        menu: []
      })
    } else {
      this.setData({
        priceAsc: 'price-asc',
        priceDesc: 'price-desc-active',
        saledAsc: 'saled-asc',
        saledDesc: 'saled-desc',
        order: 'price-desc',
        menu: []
      })
    }

    this.getMenu();
  },

  /**
   * 按销量升（降）序排列
   */
  saledSort: function (e) {
    offset = 0;
    if (e.currentTarget.dataset.sort == 'asc') {
      this.setData({
        priceAsc: 'price-asc',
        priceDesc: 'price-desc',
        saledAsc: 'saled-asc-active',
        saledDesc: 'saled-desc',
        order: 'saled_num-asc',
        menu: []
      })
    } else {
      this.setData({
        priceAsc: 'price-asc',
        priceDesc: 'price-desc',
        saledAsc: 'saled-asc',
        saledDesc: 'saled-desc-active',
        order: 'saled_num-desc',
        menu: []
      })
    }

    this.getMenu();
  },
  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    //判断是否有关键字
    if (!options.keywords) {
      options.keywords = '';
    }
      offset = 0;
      this.setData({
        menu: [],
        keywords: options.keywords
      })
      this.getMenu();
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

  }
})
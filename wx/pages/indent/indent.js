Page({
  data: {
    result: []
  },
  onLoad: function() {
    var that = this;
    wx.request({
      url: 'https://api.douban.com/v2/movie/in_theaters',
      method: 'GET',
      header: {
        'Content-Type': 'json'
      },
      success: function(res) {
        console.log(res.data);
        that.setData({
          result: res.data.subjects
        })
      },
      fail: function(error) {
        console.log(error);
      }
    })
  }
})

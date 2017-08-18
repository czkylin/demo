Page({
  data: {
    result: {},
    id: 0
  },
  onLoad: function(options) {
    this.setData({
      id: options.id
    })
  },
  onReady: function() {
    var that = this;
    wx.request({
      url: 'https://api.douban.com/v2/movie/subject/'+this.data.id,
      method: 'GET',
      header: {
        'Content-Type': 'json'
      },
      success: function(res) {
        console.log(res.data);
        that.setData({
          result: res.data
        });
        wx.setNavigationBarTitle({
          title: res.data.title
        })
      }
    })
    // console.log(this.data);
    // console.log(this.data.__webviewId__);
    // console.log(this.data.title);
    // console.log(this.data.title.id);
  }
})

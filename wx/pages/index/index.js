Page({
  data: {
    imgUrls: [
      '../../images/banner/resouce.jpg',
      '../../images/banner/banner1.jpg',
      '../../images/banner/banner2.jpg',
      '../../images/banner/banner3.jpg',
      '../../images/banner/banner4.jpg',
      '../../images/banner/banner5.jpg',
    ],
    doc: [{
      'img': 'http://weixin.yk2020.com/upload/yc_doctor/user_45135_s.jpg',
      'name': '齐海海',
      'section': '心内科'
    },{
      'img': 'http://weixin.yk2020.com/upload/yc_doctor/user_45141_s.jpg',
      'name': '王长春',
      'section': '神经外科'
    },{
      'img': 'http://weixin.yk2020.com/upload/yc_doctor/user_40236_s.jpg',
      'name': '刘蔚',
      'section': '心内科'
    },{
      'img': 'http://weixin.yk2020.com/upload/yc_doctor/user_45145_s.jpg',
      'name': '付睿',
      'section': '神经内科'
    },{
      'img':'http://weixin.yk2020.com/upload/yc_doctor/user_39911_s.jpg',
      'name': '刘家春',
      'section': '神经介入科'
    }],
    encyclopedia: [{
      'title': '是什么引发的心包积液？',
      'correlation': '心包积液',
      'count': '',
      'img': '../../images/index/01.jpg'
    },{
      'title': '心包积液的症状都有哪些？',
      'correlation': '心包积液',
      'count': '',
      'img': '../../images/index/02.jpg'
    },{
      'title': '心包积液的治疗方法都有哪些？',
      'correlation': '心包积液',
      'count': '',
      'img': '../../images/index/03.jpg'
    },{
      'title': '心包积液少量怎么更好的护理？',
      'correlation': '心包积液',
      'count': '',
      'img': '../../images/index/04.jpg'
    }]
  },
  changeIndicatorDots: function (e) {
    this.setData({
      indicatorDots: !this.data.indicatorDots
    })
  }
})
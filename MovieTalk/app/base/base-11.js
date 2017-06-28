'use strict';

import React from 'react';

import {
  StyleSheet,
  Text,
  View,
  Image,
  ListView,
  ActivityIndicator
} from 'react-native';

const REQUEST_URL = 'https://api.douban.com/v2/movie/in_theaters';

export default React.createClass({
    getInitialState() {
      this.fetchData();
      return {    //getInitialState必须通过return的方式返回state且不用写state    construct就是this.state = {}
        movies: new ListView.DataSource({    //ListView懒加载，异步加载，滑动(iphone)等其他的功能
          rowHasChanged: (row1, row2) => row1 !== row2 //判断两行值是否相同，不同时准备改变内容
        }),   //cloneWidthRows传入数据源
        loading: true
      }
    },

    fetchData() {
      fetch(REQUEST_URL)
      .then(response => response.json())
      .then(responseData => {
        this.setState({
          movies: this.state.movies.cloneWithRows(responseData.subjects),
          loading: false
        })
      })
    },

    render() {
      if (this.state.loading) {
        return (      //方法中只会执行一个return
          <View style={styles.container}>
            <ActivityIndicator/>
          </View>
        )
      }
      return() {
        <View style={styles.container}>
          <ListView
            dataSource={this.state.movies},
            renderRow={
              movie => <Text style={styles.itemText}>{movie.title}</Text>//movie为箭头函数的一个参数，两个参数要加括号
            }
          />
        </View>
      }
    }
});

let styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#eae7ff',
    paddingTop: 20
  },
  overlayHeader: {
    fontSize: 33,
    fontFamily: 'Helvetica Neue',
    color: '#eae7ff',
    padding: 10
  },
  overlaySubHeader: {
    fontSize: 16,
    fontFamily: 'Helvetica Neue',
    fontWeight: '200',
    padding: 10,
    paddingTop: 0,
    color: '#eae7ff'
  },
  backgroundImage: {
    flex: 1,
    resizeMode: 'cover'
  },
  image: {
    width: 99,
    height: 138,
    margin: 0
  },
  overlay: {
    backgroundColor: "rgba(0, 0, 0, 0.3)",
    alignItems: 'center'
  }
})

//export default Base7;
export { Base7 as default };

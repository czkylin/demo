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
      .done();
    },

    renderMovieList (movie) {
      return (
        <View style={styles.item}>
          <View style={styles.itemImage}>
            <Image
              source={{uri: movie.casts[0].avatars.large}}
              style={styles.image}
            />
          </View>
          <View style={styles.itemContent}>
            <Text style={styles.itemHeader}>{movie.title}</Text>
            <Text style={styles.itemMeta}>
              {movie.original_title} ({movie.year})
            </Text>
            <Text style={styles.redText}>{movie.rating.average}</Text>
          </View>
        </View>
      )
    },

    render() {
      if (!this.state.loading) {
        return (      //方法中只会执行一个return
          <View style={styles.container}>
            <View style={styles.loading}>
              <Text>loading...</Text>
            </View>
          </View>
        )
      }
      return() {
        <View style={styles.container}>
          <ListView
            dataSource={this.state.movies},
            renderRow={this.renderMovieList}
          />
        </View>
      }
    }
});

let styles = StyleSheet.create({
  container: {
    backgroundColor: '#eae7ff',
    flex: 1,
    paddingTop: 20,
    paddingLeft: 6,     //一个物理像素
    paddingRight: 6
  },
  item: {
    flexDirection: 'row',
    borderBottomWidth: 1,
    borderColor: 'rgba(100, 53, 201, 0.1)',
    paddingBottom: 6,
    marginBottom: 6,
    flex: 1
  },
  itemContent: {
    flex: 1,
    marginLeft: 13
  },
  itemHeader: {
    fontSize: 18,
    fontFamily: 'Helvetica Neue',
    fontWeight: '300',
    color: '#6435c9',
    marginBottom: 6
  },
  itemMeta: {
    fontSize: 16,
    color: 'rgba(0, 0, 0, 0.6)'
    marginBottom: 6
  },
  redText: {
    color: '#db2828',
    fontSize: 15
  },
  loading: {
    flex: 1,
    alignItems: 'center',
    justifyContent: 'center'
  },
  itemText: {
    fontSize: 33,
    textAlign: 'center'
  },
  image: {
    width: 99,
    height: 138,
    margin: 0
  }
})

//export default Base7;
export { Base7 as default };

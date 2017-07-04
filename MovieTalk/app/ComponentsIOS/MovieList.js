'use strict';

import React from 'react';

import {
  View,
  Text,
  Image,
  ListView,
  ActivityIndicator,
  TouchableHighlight
} from 'react-native';

import styles from '../Styles/Main';
import Detail from './Detail';

class MovieList extends React.Component {
  constructor(props) {
    super(props);

    const REQUST_URL = 'https://api.douban.com/v2/movie/in_theaters';

    this.fetchData(REQUST_URL);

    this.state = {
      movies: new ListView.DataSource({
        rowHasChanged: (row1, row2) => row1 !== row2
      }),
      loading: false
    }
  }

  fetchData(url) {
    fetch(url)
    .then(response => response.json())
    .then(responseData => {
      this.setState({
        movies: this.state.movies.cloneWithRows(responseData.subjects),
        loading: true
      })
    })
    .done();
  }

  showMovieDetail(movie) {
    this.props.navigator.push({ //react-native自带的属性，由父组件路由中携带过来
      title: movie.title,
      component: Detail,
      passProps: {movie},       //给路由中另外组件传递信息
      barTintColor: '#6435c9',  //头部背景颜色，这里是传到detail详情页的属性
      tintColor: 'rgba(255, 255, 255, 0.8)',
      titleTextColor: 'rgba(255, 255, 255, 0.8)'
    })
  }

  renderMovieList (movie) {
    return (
      <TouchableHighlight
        onPress={() => this.showMovieDetail(movie)}
        underlayColor="rgba(34, 26, 38, 0.1)"
      >
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
      </TouchableHighlight>
    )
  }


  render() {
    if( !this.state.loading ) {
      return (
        <View style={styles.container}>
          <View style={styles.loading}>
            <ActivityIndicator
              size="large"
              color="#6435c9"
            />
          </View>
        </View>
      )
    }
    return (
      <View style={styles.movieListContainer}>
        <ListView
          dataSource={this.state.movies}
          renderRow={this.renderMovieList.bind(this)}
        />
      </View>
    )
  }
}

export { MovieList as default};

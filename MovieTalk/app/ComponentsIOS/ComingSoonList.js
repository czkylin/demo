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
import icons from '../Assets/Icons';

class ComingSoonList extends React.Component {
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

  showMovieDetail(title) {
    console.log(`${title}被点击了~`);
  }

  renderMovieList (movie) {
    try {
      var imgSrc = movie.casts[0].avatars.large;
    } catch (e) {
      var imgSrc = icons.none;
    }
    return (
      <TouchableHighlight
        onPress={() => this.showMovieDetail(movie.title)}
        underlayColor="rgba(34, 26, 38, 0.1)"
      >
        <View style={styles.item}>
          <View style={styles.itemImage}>
            <Image
              source={{uri: imgSrc}}
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
      <View style={styles.container}>
        <ListView
          dataSource={this.state.movies}
          renderRow={this.renderMovieList.bind(this)}
        />
      </View>
    )
  }
}

export { ComingSoonList as default};

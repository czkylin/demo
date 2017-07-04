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

class Detail extends React.Component {
  constructor(props) {
    super(props);

    const REQUST_URL = `https://api.douban.com/v2/movie/subject/${this.props.movie.id}`;

    this.fetchData(REQUST_URL);

    this.state = {
      loading: false,
      movieDetail: null
    }
  }

  fetchData(url) {
    fetch(url)
    .then(response => response.json())
    .then(responseData => {
      // console.log(responseData.summary);
      this.setState({
        movieDetail: responseData,
        loading: true
      })
    })
    .done();
  }

  render() {
    if( !this.state.loading ){
      return (
        <View style={styles.container}>
          <View style={styles.loading}>
            <ActivityIndicator
              size='large'
              color='#6435c9'
            />
          </View>
        </View>
      )
    }

    let movie = this.state.movieDetail;
    let summary = movie.summary.split(/\n/).map((p, index) => {
      return (
        <View key={index}>
          <Text style={styles.itemText, styles.content}>{p}</Text>
        </View>
      )
    })

    return (
      <View style={styles.container, {paddingTop: 70}}>
        <View style={styles.item, {flexDirection: 'column'}}>
          {summary}
        </View>
      </View>
    )
  }
}

export default Detail;

'use strict';

import React from 'react';
import styles from '../Styles/Main';
import MovieList from './MovieList';

import {
  Text,
  View,
  NavigatorIOS
} from 'react-native';

class Featured extends React.Component {
  render() {
    return(
      <NavigatorIOS
        initialRoute={{
          component: MovieList,
          title: '正在热映',
          barTintColor: 'darkslateblue',
          tintColor: 'rgba(255, 255, 255, 0.8)',
          titleTextColor: 'rgba(255, 255, 255, 0.8)',
        }}
        style={styles.container}

      >

      </NavigatorIOS>
    )
  }
};

export {Featured as default}

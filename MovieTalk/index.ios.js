/**
 * Sample React Native App
 * https://github.com/facebook/react-native
 * @flow
 */

import React, { Component } from 'react';
import {
  AppRegistry,
  TabBarIOS
} from 'react-native';

import MovieList from './app/ComponentsIOS/MovieList';
import ComingSoonList from './app/ComponentsIOS/ComingSoonList';
import icons from './app/Assets/Icons';

export default class MovieTalk extends Component {
  render() {
    return (
      <TabBarIOS
        barTintColor="darkslateblue"
        tintColor="white"
        unselectedTintColor="#6435c9"
      >
        <TabBarIOS.Item
          title="正在热映"
          icon={{uri: icons.starActive, scale: 4.6}}
          selected={true}
        >
          <MovieList />
        </TabBarIOS.Item>
        <TabBarIOS.Item
          title="即将上映"
          icon={{uri: icons.calendar, scale: 4.6}}
        >
          <ComingSoonList />
        </TabBarIOS.Item>
      </TabBarIOS>
    );
  }
}

AppRegistry.registerComponent('MovieTalk', () => MovieTalk);

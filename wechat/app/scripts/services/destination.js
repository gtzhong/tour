'use strict';

/**
 * @ngdoc service
 * @name wechatApp.destination
 * @description
 * # destination
 * Factory in the wechatApp.
 */
angular.module('wechatApp')
    .factory('destination', ['$q', '$http', 'config', function($q, $http, config) {
        // Service logic
        var self = this;
        self.destinations = [];
        var getDestinations = function() {
            // 定义promise 解决异步问题
            var deferred = $q.defer();
            var promise = deferred.promise;

            // $http去后台获取数据
            $http({
                method: 'GET',
                url: config.apiUrl + 'Destination/getDestinations',
            }).then(function successCallback(response) {
                console.log(response);
                if (typeof response.data.errorCode !== 'undefined') {
                    console.log('系统发生错误：' + response.data.error);
                } else {
                    // 逻辑处理 
                    self.destinations = response.data.data;
                }
                deferred.resolve(self.destinations); //执行成功
            }, function errorCallback(response) {
                deferred.reject(); //执行失败
            });
        };


        // Public API here
        return {
            getDestinations: function() {
                return getDestinations();
            },
        };
    }]);

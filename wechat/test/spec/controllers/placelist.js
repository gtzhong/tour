'use strict';

describe('Controller: PlacelistCtrl', function () {

  // load the controller's module
  beforeEach(module('wechatApp'));

  var PlacelistCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    PlacelistCtrl = $controller('PlacelistCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    // expect(PlacelistCtrl.awesomeThings.length).toBe(3);
  });
});

define([
    'utils/underscore',
    'controller/events-middleware',
], function (_, middleware) {
    QUnit.module('events-middleware');
    var test = QUnit.test.bind(QUnit);

    var mockModel = function(attributes) {
        var model = {
            get: function (attribute) {
                return this[attribute];
            }
        };

        return _.extend({}, model, attributes);
    }

    test('should add viewable to the play event', function (assert) {
        var model = mockModel({ viewable: 1 });
        var expected = { viewable: 1, foo: 'bar' };
        var actual = middleware(model, 'play', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('should add viewable to the paused event', function (assert) {
        var model = mockModel({ viewable: 1 });
        var expected = { viewable: 1, foo: 'bar' };
        var actual = middleware(model, 'pause', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('should add viewable to the time event', function (assert) {
        var model = mockModel({ viewable: 1 });
        var expected = { viewable: 1, foo: 'bar' };
        var actual = middleware(model, 'time', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('should add viewable to the beforePlay event', function (assert) {
        var model = mockModel({ viewable: 1 });
        var expected = { viewable: 1, foo: 'bar' };
        var actual = middleware(model, 'beforePlay', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('should add viewable to the ready event', function (assert) {
        var model = mockModel({ viewable: 1 });
        var expected = { viewable: 1, foo: 'bar' };
        var actual = middleware(model, 'ready', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('should not add viewable if visibility is undefined', function (assert) {
        var model = mockModel({ viewable: undefined });
        var expected = { foo: 'bar' };
        var actual = middleware(model, 'time', { foo: 'bar' });
        assert.deepEqual(actual, expected);
    });

    test('does not modify original data when the type does not have a case', function (assert) {
        var expected = { foo: 'bar' };
        var actual = middleware(mockModel({}), 'cat', expected);
        assert.equal(actual, expected);
    });
});
from rest_framework import serializers
from user.models import User
from var_dump import var_dump

class UserSerializer(serializers.HyperlinkedModelSerializer):
    class Meta:
        model = User
        fields = ['username', 'first_name', 'last_name']

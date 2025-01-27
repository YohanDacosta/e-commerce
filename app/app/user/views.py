import json
from rest_framework import status
from rest_framework.response import Response
from rest_framework.decorators import api_view
from rest_framework_simplejwt.views import TokenObtainPairView
from rest_framework_simplejwt.serializers import TokenObtainPairSerializer

from .models import User
from api.serializers import UserSerializer
from .controllers import UserController

# Create your views here.

class CustomTokenObtainPairSerializer(TokenObtainPairSerializer):
    @classmethod
    def get_token(cls, user):
        token = super().get_token(user)

        token['email'] = user.username
        token['firstname'] = user.first_name
        token['lastname'] = user.last_name

        return token

class CustomTokenObtainPairView(TokenObtainPairView):
    serializer_class = CustomTokenObtainPairSerializer

@api_view(['POST'])
def createUser(request):
    message = "User has been created successfully"
    isVal = True
    username = request.data['username']
    first_name = request.data['firstname']
    last_name = request.data['lastname']
    password  = request.data['password']
    password2  = request.data['password2']

    userCtr = UserController()

    data = userCtr.createUserCtr(username=username, first_name=first_name, last_name=last_name, password=password, password2=password2)
    
    return Response(data=data)

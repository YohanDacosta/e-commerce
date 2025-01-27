from rest_framework import status
from rest_framework.response import Response

from api.serializers import UserSerializer
from .models import User

class UserController:

    def __init__(self) -> None:
        pass

    def createUserCtr(self, username:str, first_name:str, last_name:str, password:str, password2:str):
        isVal = True
        message = "User has been created successfully"
        
        if not username:
            isVal = False
            message = "User must have an username!"

        if not first_name:
            isVal = False
            message = "User must have an first_name!"

        if not password:
            isVal = False
            message = "User must have an password!"

        if(password != password2):
            isVal = False
            message = "Passwords don't match!"

        existsUser = self._getUserCtr(username)

        if existsUser:
            isVal = False
            message = "User already exists!"

        if not isVal:
            return {
                'message':message,
                'status': status.HTTP_400_BAD_REQUEST
            }

        user = User(
            username=username,
            first_name = first_name,
            last_name = last_name,
            password  = password
        )
        user.set_password(user.password) 
        user.save()
        serializer = UserSerializer(user)

        return {
                'message':message,
                'data':serializer.data,
                'status':status.HTTP_200_OK
            }

    def _getUserCtr(self, username:str):
        user = User.objects.filter(username=username)

        if not user:
            return False
        return True







    def getUsersCtr():
        users = User.objects.all()
        serializer = UserSerializer(users, many= True)

        return serializer
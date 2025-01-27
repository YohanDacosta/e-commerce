from django.shortcuts import render
from rest_framework.response import Response
from rest_framework.decorators import api_view, permission_classes
from rest_framework.permissions import IsAuthenticated
from rest_framework import status
from user.models import User
from .serializers import UserSerializer

# Create your views here.

@api_view(['GET'])
def getRoutes(request):
    routes = [
        '/api/token',
        '/api/token/refresh',
    ]

    return Response(routes)

@api_view(['POST'])
@permission_classes([IsAuthenticated])
def getUser(request):
    print(request.data)
    

    return Response(status= status.HTTP_200_OK)


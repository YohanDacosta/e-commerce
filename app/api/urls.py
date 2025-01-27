from django.urls import path
from . import views

urlpatterns = [
    path('', views.getRoutes),
    path('list-users/', views.getUser, name='list-users'),
]

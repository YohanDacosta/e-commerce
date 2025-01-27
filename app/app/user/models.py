from django.db import models
from django.contrib.auth.base_user import AbstractBaseUser
from django.contrib.auth.models import AbstractUser


class CustomUserManager(AbstractBaseUser):
    def create_user(self, username, first_name, password, **extra_fields):
        username = self.normalize_username(username)

        user = self.model(
            username=username,
            first_name=first_name,
            **extra_fields
        )
        if password is not None:
            user.set_password(password)
        user.save()

        return user

    def create_superuser(self, username, first_name, password, **extra_fields):
        extra_fields.setdefault("is_staff", True)
        extra_fields.setdefault("is_superuser", True)
        extra_fields.setdefault("is_active", True)

        if extra_fields.get("is_staff") is not True:
            raise ValueError("Superuser has been True")

        return self.create_user(username=username, first_name=first_name, password=password, **extra_fields)


class User(AbstractUser):
    first_name = models.CharField(verbose_name='First Name', max_length=255)
    last_name = models.CharField(verbose_name='Last Name', max_length=255)
    username = models.EmailField(verbose_name='Email Address', max_length=255, unique=True)
    password = models.CharField(max_length=255)

    object = CustomUserManager()

    USERNAME_FIELD = "username"
    REQUIRED_FIELDS = ["first_name"]  

    def __str__(self):
        return self.username


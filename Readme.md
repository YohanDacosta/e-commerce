python3 -m venv env
source app/env/bin/activate
pip3 install -r requirements.txt
django-admin startproject mysite
django-admin startapp myapp

python3 manage.py makemigration | python3 manage.py makemigration (myapp)
python3 manage.py migrate | python3 manage.py migrate (myapp)
python3 manage.py createsuperuser
python3 manage.py runserver
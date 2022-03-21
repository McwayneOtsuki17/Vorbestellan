from django import forms
from .models import *

class UsersForm(forms.ModelForm):
    class Meta:
        model = Users
        exclude = ['first_name', 'last_name', 'contact','barangay','city','status']

class RoomsForm(forms.ModelForm):
    class Meta:
        model = Rooms
        exclude = ['room_name', 'room_type', 'image']

class ReservationsForm(forms.ModelForm):
    class Meta:
        model = Reservations
        exclude = ['status']
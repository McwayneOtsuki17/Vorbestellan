from django.contrib import messages
from django.http import HttpResponse
from django.shortcuts import render, redirect
from django.views.generic import View
from django.views.generic import View
from .forms import *
from .models import *
from passlib.hash import pbkdf2_sha256
from django.db.models import Q
from django.core import serializers
from django.http import JsonResponse
from django.db.models import Count

def logout(request):
    try:
        del request.session['user']
    except:
        return redirect('vorbestellenapp:index_view')
    return redirect('vorbestellenapp:index_view')

def removefilter(request):
    try:
        del request.session['filtertrigger']
    except:
        return redirect('vorbestellenapp:vacantrooms_view')
    return redirect('vorbestellenapp:vacantrooms_view')

def removefilterbook(request):
    try:
        del request.session['filtertriggerbook']
    except:
        return redirect('vorbestellenapp:vacantrooms_view')
    return redirect('vorbestellenapp:vacantrooms_view')

def removefilterdate(request):
    try:
        del request.session['filterbookdate']
    except:
        return redirect('vorbestellenapp:vacantrooms_view')
    return redirect('vorbestellenapp:vacantrooms_view')

class IndexView(View): 
    def get(self, request): 
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username=current_user)     

            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'Index.html', context)
        else: 
            return render(request, 'Index.html', {})
            
    def post(self, request):
        if request.method == 'POST':
            username = request.POST.get('username')
            password = request.POST.get('password')
            check_password = pbkdf2_sha256.hash(password, rounds=20000, salt_size=16)
            dec_password = pbkdf2_sha256.verify(password, check_password)
            check_user = Users.objects.filter(username=username)
            if check_user and dec_password:
                request.session['user'] = username
                if Users.objects.filter(username=username).count()>0:
                    return redirect('vorbestellenapp:index_view')
            else:
                messages.info(request, 'Incorrect Username and Password!', extra_tags='login')
                return redirect('vorbestellenapp:index_view')
        return redirect('vorbestellenapp:index_view')
            

class AboutView(View): 
    def get(self, request): 
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username=current_user)       

            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'About.html', context)
        else:
            return render(request, 'About.html', {})
        
    def post(self, request):
        if request.method == 'POST':
            username = request.POST.get('username')
            password = request.POST.get('password')
            check_password = pbkdf2_sha256.hash(password, rounds=20000, salt_size=16)
            dec_password = pbkdf2_sha256.verify(password, check_password)
            check_user = Users.objects.filter(username=username)
            if check_user and dec_password:
                request.session['user'] = username
                if Users.objects.filter(username=username).count()>0:
                    return redirect('vorbestellenapp:about_view')
            else:
                messages.info(request, 'Incorrect Username and Password!', extra_tags='login')
                return redirect('vorbestellenapp:about_view')
        return redirect('vorbestellenapp:about_view')
        
class ContactView(View): 
    def get(self, request): 
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username=current_user)  

            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'Contact.html', context)
        else:
            return render(request, 'Contact.html', {})

    def post(self, request):
        if request.method == 'POST':
            username = request.POST.get('username')
            password = request.POST.get('password')
            check_password = pbkdf2_sha256.hash(password, rounds=20000, salt_size=16)
            dec_password = pbkdf2_sha256.verify(password, check_password)
            check_user = Users.objects.filter(username=username)
            if check_user and dec_password:
                request.session['user'] = username
                if Users.objects.filter(username=username).count()>0:
                    return redirect('vorbestellenapp:contact_view')
            else:
                messages.info(request, 'Incorrect Username and Password!', extra_tags='login')
                return redirect('vorbestellenapp:contact_view')
        return redirect('vorbestellenapp:contact_view')

class AdminView(View): 
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username="admin")
            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'Admin.html', context)
        else:
            return HttpResponse('Please login first to view this page.') 

class PriceView(View): 
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.all()
            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'pricing.html', context)
        else:
            return render(request, 'pricing.html', {})
            

    def post(self, request):
        if request.method == 'POST':
            if 'btnLogin' in request.POST:
                username = request.POST.get('username')
                password = request.POST.get('password')
                check_password = pbkdf2_sha256.hash(password, rounds=20000, salt_size=16)
                dec_password = pbkdf2_sha256.verify(password, check_password)
                check_user = Users.objects.filter(username=username)
                if check_user and dec_password:
                    request.session['user'] = username
                    if Users.objects.filter(username=username).count()>0:
                        return redirect('vorbestellenapp:pricing_view')
                else:
                    messages.info(request, 'Incorrect Username and Password!', extra_tags='login')
                    return redirect('vorbestellenapp:pricing_view')
            elif 'btnAlpha' in request.POST:
                request.session['roomtype'] = "Alpha"
                request.session['price'] = 150.00
                return redirect('vorbestellenapp:booking_view')
            elif 'btnBravo' in request.POST:
                request.session['roomtype'] = "Bravo"
                request.session['price'] = 250.00
                return redirect('vorbestellenapp:booking_view')
            elif 'btnCharlie' in request.POST:
                request.session['roomtype'] = "Charlie"
                request.session['price'] = 350.00
                return redirect('vorbestellenapp:booking_view')
            elif 'btnDelta' in request.POST:
                request.session['roomtype'] = "Delta"
                request.session['price'] = 450.00
                return redirect('vorbestellenapp:booking_view')

        return redirect('vorbestellenapp:pricing_view')

class SignUpView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.all()
            context = {
                'current_user': current_user,
                'users' : users,
            }
            return render(request, 'signup.html', context)
        else:
            return render(request, 'signup.html', {})
    def post(self, request):        
        form = UsersForm(request.POST, request.FILES)        
        if form.is_valid():
            # try:
            username = request.POST.get("username")
            password = request.POST.get("password")
            confirmpassword = request.POST.get("cpassword")
            enc_password = pbkdf2_sha256.encrypt(password, rounds=12000, salt_size=32)
            email = request.POST.get("email")
            if(confirmpassword == password):
                if Users.objects.filter(username=username).count()>0:
                    messages.info(request, 'Username already exists!')
                    return redirect('vorbestellenapp:signup_view') 
                else:
                    form = Users(username = username, password = enc_password, email = email)
                    form.save()
                    check_user = Users.objects.filter(username=username, password=enc_password, email = email)
                    if check_user:
                        request.session['user'] = username
                        return redirect('vorbestellenapp:index_view')
            else:
                messages.info(request, 'Passwords do not match!', extra_tags='signin')
                return redirect('vorbestellenapp:signup_view')
        else:
            print(form.errors)
            messages.info(request, 'Account already exists! Please try another unique one.', extra_tags='try')
            return redirect('vorbestellenapp:signup_view')

class AccountView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username=current_user)
            rooms = Rooms.objects.all()
            reser = Reservations.objects.all()
            context = {
                'current_user': current_user,
                'users' : users,
                'rooms' : rooms,
                'reser' : reser,
            }
            return render(request, 'account.html', context)
        else:
            return HttpResponse('Please login first to view this page.')

    def post(self, request):
        if request.method == 'POST':
            form = UsersForm(request.POST, request.FILES)
            username = request.POST.get("username")
            u = Users.objects.get(username=username)
            first_name = request.POST.get("first_name")
            last_name = request.POST.get("last_name")
            barangay = request.POST.get("barangay")
            city = request.POST.get("city")
            contact = request.POST.get("contact")
            status = "Complete"
            if 'Not set' in first_name or 'Not set' in last_name or 'Not set' in barangay or 'Not set' in city or 'Not set' in contact:
                u.status = "Incomplete"
            else:
                u.first_name = first_name
                u.last_name = last_name
                u.barangay = barangay
                u.city = city
                u.contact = contact
                u.status = status

            u.save()
        return redirect('vorbestellenapp:account_view')

class RoomsView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username="admin")
            rooms = Rooms.objects.all()
            context = {
                'current_user': current_user,
                'users' : users,
                'rooms' : rooms,
            }
            if current_user == "admin":
                return render(request, 'rooms.html', context)
            else:
                return HttpResponse('You are not an admin!')
        else:
            return HttpResponse('Please login first to view this page.') 

    def post(self, request):
        if request.method == 'POST':
            form = RoomsForm(request.POST, request.FILES) 
            if 'btnAddRoom' in request.POST:
                if form.is_valid():
                    room_name = request.POST.get('roomname')
                    room_type = request.POST.get('roomtype')
                    # image = request.FILES["room_pic"]
                    image = request.POST.get('addroom_image')
                    imageAlpha = request.POST.get('addroom_imageA')
                    imageAlphaone = request.POST.get('addroom_imageAone')
                    imageBravo = request.POST.get('addroom_imageB')
                    imageBravo1 = request.POST.get('addroom_imageB1')
                    imageCharlie = request.POST.get('addroom_imageC')
                    imageCharlie1 = request.POST.get('addroom_imageC1')
                    imageDelta = request.POST.get('addroom_imageD')
                    imageDelta1 = request.POST.get('addroom_imageD1')
                    typeAlpha = "Alpha"
                    typeBravo = "Bravo"
                    typeCharlie = "Charlie"
                    typeDelta = "Delta"
                    if 'Alpha' in request.POST.get("roomtype"):
                        if 'Alpha' in image:
                            form = Rooms(room_name = room_name, room_type = typeAlpha, image=imageAlpha)
                        elif 'oneAl' in image:
                            form = Rooms(room_name = room_name, room_type = typeAlpha, image=imageAlphaone)
                    elif 'Bravo' in request.POST.get("roomtype"):
                        if 'Bravo' in image:
                            form = Rooms(room_name = room_name, room_type = typeBravo, image=imageBravo)
                        elif 'oneBr' in image:
                            form = Rooms(room_name = room_name, room_type = typeBravo, image=imageBravo1)
                    elif 'Charlie' in request.POST.get("roomtype"):
                        if 'Charlie' in image:
                            form = Rooms(room_name = room_name, room_type = typeCharlie, image=imageCharlie)
                        elif 'oneCh' in image:
                            form = Rooms(room_name = room_name, room_type = typeCharlie, image=imageCharlie1)
                    elif 'Delta' in request.POST.get("roomtype"):
                        if 'Delta' in image:
                            form = Rooms(room_name = room_name, room_type = typeDelta, image=imageDelta)
                        elif 'oneDe' in image:
                            form = Rooms(room_name = room_name, room_type = typeDelta, image=imageDelta1)

                    form.save() 
                    return redirect('vorbestellenapp:rooms_view')
                else:
                    print(form.errors)
                    return HttpResponse('not valid')

            elif 'btnUpdateRoom' in request.POST:
                # image = request.FILES['updroom_pic']
                image = request.POST.get("updroom_image")
                imageAlpha = request.POST.get('updroom_imageA')
                imageAlpha1 = request.POST.get('updroom_imageA1')
                imageBravo = request.POST.get('updroom_imageB')
                imageBravo1 = request.POST.get('updroom_imageB1')
                imageCharlie = request.POST.get('updroom_imageC')
                imageCharlie1 = request.POST.get('updroom_imageC1')
                imageDelta = request.POST.get('updroom_imageD')
                imageDelta1 = request.POST.get('updroom_imageD1')
                room_name = request.POST.get('updroom_name')
                room_type = request.POST.get('updroom_type')
                room_code = request.POST.get('updroom_code')
                r = Rooms.objects.get(room_code=room_code)
                r.room_name = room_name
                r.room_type = room_type
                if 'Alpha' in room_type:
                    if 'Alpha' in image:
                        r.image = imageAlpha
                    elif 'oneAl' in image:
                        r.image =imageAlpha1
                    else:
                       return HttpResponse('Please match the code with the type.')
                if 'Bravo' in room_type:
                    if 'Bravo' in image:
                        r.image = imageBravo
                    elif 'oneBr' in image:
                        r.image =imageBravo1
                    else:
                       return HttpResponse('Please match the code with the type.')
                if 'Charlie' in room_type:
                    if 'Charlie' in image:
                        r.image = imageCharlie
                    elif 'oneCh' in image:
                        r.image =imageCharlie1
                    else:
                       return HttpResponse('Please match the code with the type.')  
                if 'Delta' in room_type:
                    if 'Delta' in image:
                        r.image = imageDelta
                    elif 'oneDe' in image:
                        r.image =imageDelta1
                    else:
                       return HttpResponse('Please match the code with the type.')  
                r.save()
                return redirect('vorbestellenapp:rooms_view')

            elif 'btnDeleteRoom' in request.POST:
                room_code = request.POST.get('delroom_code')
                Rooms.objects.get(room_code=room_code).delete()
                return redirect('vorbestellenapp:rooms_view')

class BookingView(View): 
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            current_roomtype = request.session['roomtype']
            current_price = request.session['price']
            users = Users.objects.filter(username=current_user)
            rooms = Rooms.objects.filter(room_type=current_roomtype)
            context = {
                'current_user': current_user,
                'users' : users,
                'current_roomtype': current_roomtype,
                'current_price': current_price,
                'rooms': rooms,
            }
            # return render(request, 'booking.html', context)
            return render(request, 'reservation.html', context)
            # return render(request, 'mybookings.html', context)
        else:
            # return render(request, 'booking.html', {})
            return render(request, 'reservation.html', {})
            # return render(request, 'mybookings.html', {})
          

    def post(self, request):
        if request.method == 'POST':
            if 'btnLogin' in request.POST:
                username = request.POST.get('username')
                password = request.POST.get('password')
                check_password = pbkdf2_sha256.hash(password, rounds=20000, salt_size=16)
                dec_password = pbkdf2_sha256.verify(password, check_password)
                check_user = Users.objects.filter(username=username)
                if check_user and dec_password:
                    request.session['user'] = username
                    if Users.objects.filter(username=username).count()>0:
                        return redirect('vorbestellenapp:booking_view')
                else:
                    messages.info(request, 'Incorrect Username and Password!', extra_tags='login')
                    return redirect('vorbestellenapp:booking_view')
            elif 'btnBook' in request.POST:
                form = ReservationsForm(request.POST, request.FILES)
                room_name = request.POST.get("room_name")
                room_time = request.POST.get("room_time")
                room_date = request.POST.get("room_date")
                reserver_id = request.POST.get("rsrvname")
                full_name = request.POST.get("fullname")
                contact = request.POST.get("contact")
                payment = request.POST.get("room_price")

                if Reservations.objects.filter(date=room_date).count()>0 and Reservations.objects.filter(time=room_time).count()>0 and Reservations.objects.filter(room_name_id=room_name).count()>0:
                    messages.info(request, 'Reservation already exists!')
                    return redirect('vorbestellenapp:booking_view')
                elif 'Not set' in full_name or 'Not set' in contact:
                    messages.info(request, 'Please complete your account details first.')
                    return redirect('vorbestellenapp:account_view') 
                else:
                    form = Reservations(room_name_id=room_name, reserver_id_id=reserver_id, contact=contact, time=room_time, date=room_date,
                            reserver=full_name, payment=payment)
                    form.save()
                return redirect('vorbestellenapp:booking_view')
        return redirect('vorbestellenapp:booking_view')

class MngBkngsView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            users = Users.objects.filter(username="admin")
            reser = Reservations.objects.filter(status="Pending")
            vreser = Reservations.objects.filter(status="Verified")
            context = {
                'current_user': current_user,
                'users' : users,
                'reser' : reser,
                'vreser' : vreser,
            }
            return render(request, 'managebookings.html', context)
        else:
            return HttpResponse('Please login first to view this page.') 

    def post(self, request):
        if request.method == 'POST':
            form = RoomsForm(request.POST, request.FILES) 
            if 'btnAcceptReservation' in request.POST:
                form = ReservationsForm(request.POST, request.FILES) 
                acceptroom = request.POST.get("acceptroom")
                a = Reservations.objects.get(reservation_id=acceptroom)
                a.status = "Verified"
                a.save()
                return redirect('vorbestellenapp:managebookings_view')

            elif 'btnChangeReservation' in request.POST:
                form = ReservationsForm(request.POST, request.FILES) 
                pendingroom = request.POST.get("pendingroom")
                p = Reservations.objects.get(reservation_id=pendingroom)
                p.status = "Pending"
                p.save()
                return redirect('vorbestellenapp:managebookings_view')

            #delete from Verification table
            elif 'btndeleteReservation' in request.POST:
                form = ReservationsForm(request.POST, request.FILES) 
                vreser_code = request.POST.get('tobedelroom')
                Reservations.objects.get(reservation_id=vreser_code).delete()
                return redirect('vorbestellenapp:managebookings_view')

class MngUsersView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            admin = Users.objects.filter(username="admin")
            users = Users.objects.all()
            context = {
                'current_user': current_user,
                'admin' : admin,
                'users' : users,
            }
            return render(request, 'manageusers.html', context)
        else:
            return HttpResponse('Please login first to view this page.') 

    def post(self, request):
        if request.method == 'POST':
            form = UsersForm(request.POST, request.FILES) 
            if 'btnAddUser' in request.POST:
                if form.is_valid():
                    username = request.POST.get('username')
                    password = request.POST.get("password")     
                    enc_password = pbkdf2_sha256.encrypt(password, rounds=12000, salt_size=32)
                    email = request.POST.get('email')

                    if Users.objects.filter(username=username).count()>0:
                        messages.info(request, 'Username already exists!')
                        return redirect('vorbestellenapp:signup_view') 
                    else:
                        form = Users(username = username, password = enc_password, email = email)
                        form.save()
                        check_user = Users.objects.filter(username=username, password=enc_password, email = email)
                        
                        return redirect('vorbestellenapp:manageusers_view')
                else:
                    print(form.errors)
                    return HttpResponse('not valid')

            elif 'btnUpdateUser' in request.POST:
                upuser_id = request.POST.get("upuser_id")
                uppassword = request.POST.get("uppassword")     
                enc_uppassword = pbkdf2_sha256.encrypt(uppassword, rounds=12000, salt_size=32)
                upemail = request.POST.get("upemail")  
                u = Users.objects.filter(user_id=upuser_id).update(password = enc_uppassword, email = upemail)
                print(u)
                return redirect('vorbestellenapp:manageusers_view')

            elif 'btnDeleteUser' in request.POST:
                user_id = request.POST.get('deluser_id')
                Users.objects.get(user_id=user_id).delete()
                return redirect('vorbestellenapp:manageusers_view')

class VacantRoomsView(View):
    def get(self, request):
        if 'user' in request.session:
            current_user = request.session['user']
            rooms = Rooms.objects.all()
            reservations = Reservations.objects.all()
            #SQL for most common booked room
            most_common = Reservations.objects.values_list("room_name_id", flat=True).annotate(count=Count('room_name_id')).order_by("-count").first()
            #QuerySet for creating a list of number of books per room
            book_count = Reservations.objects.values("room_name_id").annotate(count=Count('room_name_id')).order_by("-count")
            #Reference QuerySet for filtering respective room images
            bookings = Reservations.objects.values_list("room_name_id", flat=True).annotate(count=Count('room_name_id')).order_by("-count")
            #List of reference
            bookingslist = list(book_count)
            book_list = bookingslist
            maxbooked = Rooms.objects.filter(room_name=most_common)
            if 'filtertrigger' in request.session:
                reserved_list = request.session['reserved_list']
                filtertrigger = request.session['filtertrigger']
                vacants = Rooms.objects.filter(~Q(room_name__in=reserved_list))
                context = {
                'current_user': current_user,
                'rooms' : rooms,
                'reservations' : reservations,
                'filtertrigger': filtertrigger,
                'vacants': vacants,
                'reserved_list':reserved_list,
                'maxbooked': maxbooked,
                'book_count': book_count,
                'book_list': book_list,
                }
                return render(request, 'vacantrooms.html', context)
            elif 'filtertriggerbook' in request.session:
                reserved_bookings = request.session['reserved_bookings']
                filtertriggerbook = request.session['filtertriggerbook']
                filterbookdate = request.session['filterbookdate']
                filterbookings = Reservations.objects.filter(room_name__in=reserved_bookings).filter(date=filterbookdate).values("room_name_id").annotate(count=Count('room_name_id')).order_by("-count")
                listbookings = list(filterbookings)
                context = {
                'current_user': current_user,
                'rooms' : rooms,
                'reservations' : reservations,
                'filtertriggerbook': filtertriggerbook,
                'maxbooked': maxbooked,
                'book_count': book_count,
                'book_list': book_list,
                'listbookings': listbookings,
                }
                return render(request, 'vacantrooms.html', context)
            context = {
                'current_user': current_user,
                'rooms' : rooms,
                'reservations' : reservations,
                'maxbooked': maxbooked,
                'book_count': book_count,
                'book_list': book_list,
            }
            return render(request, 'vacantrooms.html', context)
        else:
            return HttpResponse('Please login first to view this page.') 

    def post(self, request):
        if request.method == 'POST':
            form = ReservationsForm(request.POST, request.FILES)
            if 'btnFilter' in request.POST:
                room_date = request.POST.get("room_date")
                room_time = request.POST.get("room_time")
                filtertrigger = request.POST.get("filtertrigger")
                if Reservations.objects.filter(date=room_date).count()>0 and Reservations.objects.filter(time=room_time).count()>0:
                    request.session['filtertrigger'] = filtertrigger
                    reserved = Reservations.objects.filter(date=room_date).filter(time=room_time).filter(status="Verified").values_list('room_name_id', flat=True)
                    reserved_list = list(reserved)
                    request.session['reserved_list'] = reserved_list
                    return redirect('vorbestellenapp:vacantrooms_view')
            if 'btnBookings' in request.POST:
                room_date = request.POST.get("room_date_book")
                #get number of bookings per room name and convert to list
                reservedbookings = Reservations.objects.filter(date=room_date).filter(status="Verified").values_list('room_name_id', flat=True)
                reserved_bookings = list(reservedbookings)
                #pass filter for bookings
                filtertriggerbook = request.POST.get("filtertriggerbook")
                request.session['reserved_bookings'] = reserved_bookings
                request.session['filtertriggerbook'] = filtertriggerbook
                request.session['filterbookdate'] = room_date
                return redirect('vorbestellenapp:vacantrooms_view')
            return redirect('vorbestellenapp:vacantrooms_view')   
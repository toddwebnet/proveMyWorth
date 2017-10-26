<h1>Profile Information</h1>
<form id="profileForm" onsubmit="return false">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
<table>
    <tr>
        <td style="font-weight:bold">Name:</td>
        <td><input type="text" name="name" value="{{ $name }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">Email:</td>
        <td><input type="text" name="email" value="{{ $email }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">DOB:</td>
        <td><input type="text" name="birthdate" value="{{ $birthdate }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">Phone Number:</td>
        <td><input type="text" name="phone_number" value="{{ $phone_number }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">Address:</td>
        <td><input type="text" name="street" value="{{ $street }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">City:</td>
        <td><input type="text" name="city" value="{{ $city }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">State:</td>
        <td><input type="text" name="state" value="{{ $state }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">Zipcode:</td>
        <td><input type="text" name="zip" value="{{ $zip }}"/></td>
    </tr>
    <tr>
        <td style="font-weight:bold">Lat:</td>
        <td><input type="text" name="latitude" value="{{ $latitude }}"/></td>
    </tr><tr>
        <td style="font-weight:bold">Long:</td>
        <td><input type="text" name="longitude" value="{{ $longitude }}"/></td>
    </tr><tr>
        <td><input type="button" value="Save"  onclick="saveProfile()"/></td>
        <td><input type="button" value="Cancel" onclick="loadDashboard()"/></td>
    </tr>
</table>
</form>
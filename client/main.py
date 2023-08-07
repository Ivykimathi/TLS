from twilio.rest import Client

account_sid = 'AC4202dfa23e5f5a36d110d057c6eaa6f0'
auth_token = '8bdca9bf5ee1666a78c3086df506b13b'
client = Client(account_sid, auth_token)

message = client.messages.create(
  from_='whatsapp:+14155238886',
  body='Hey quick reminder for your scheduled class, remember to pack your meal',
  to='whatsapp:+254115151539'
)

print(message.sid)